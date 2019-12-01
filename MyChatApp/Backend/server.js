var express = require('express');
const bcrypt = require('bcrypt');
var app = express();
var bodyParser = require('body-parser');
app.use( bodyParser.json() );       // to support JSON-encoded bodies
app.use(bodyParser.urlencoded({     // to support URL-encoded bodies
  extended: true
}));

app.use(express.json());       // to support JSON-encoded bodies
app.use(express.urlencoded()); // to support URL-encoded bodies

const { MongoClient, ObjectID } = require('mongodb');                  
var url = "mongodb://localhost:27017/Chat";

let db;

MongoClient.connect(url, { useUnifiedTopology: true }, function(
  err,
  client
) {
  db = client.db('ChatApp');
  console.log('Connected to DB');
  if (err) throw err;
});

// Create application/x-www-form-urlencoded parser
var urlencodedParser = bodyParser.urlencoded({ extended: false })

app.get('/debug', urlencodedParser, function(req, res){
    db.collection("users").find().toArray(function(err, result){
      console.log(result);
    }); //and then print the json of each of its elements
    db.collection("contacts").find().toArray(function(err, result){
      console.log(result);
    });;
    db.collection("messages").find().toArray(function(err, result){
      console.log(result);
    });;
})
app.post('/signup', urlencodedParser, function (req, res) {
   var username = req.body.data.username;
   var password = req.body.data.password;
   bcrypt.hash(password, 10, function(err, hash) {
    var query = { username: username };
    db.collection("users").find(query).toArray(function(err, result) {
      if (err)
      {
        console.log("Error");
      }
      else
      {
        console.log(result.length);
        if(result.length == 0)
        {
          db.collection("users").find().toArray(function(err, result2){
            var new_document = {
              id: result2.length + 1,
              username: username,
              password: hash
            };
            db.collection("users").insertOne(new_document, function(err, res2){
              if (err) throw err;
              console.log("1 document inserted");
              response={
                status: 1,
                message: "New User Created. Please Login to Proceed"
              };
              res.end(JSON.stringify(response));
            })
          })
        }
        else
        {
          console.log(result);
          response = {
            status: 0,
            message: "Username already exists"
          };
          res.end(JSON.stringify(response));
        }
      }
    });
  });
})

app.post("/login", urlencodedParser, function (req, res){
  var username = req.body.data.username;
  var password = req.body.data.password;
  var query = { username: username };
  db.collection("users").find(query).toArray(function(err, result){
    if (err) throw err;
    if(result.length == 0)
    {
      response = {
        status: 0,
        messages: []
      }
      res.end(JSON.stringify(response));
    }
    else
    {
      bcrypt.compare(password, result[0]["password"], function(err, res_comp) {
        if(res_comp == true)
        {
          query = { $or:[{userid1: result[0]["id"]},{userid2: result[0]["id"]}] };
          db.collection("contacts").find(query).toArray(function(err, contacts_list){
            response = {
              status: 1,
              userid: result[0]["id"],
              username: result[0]["username"],
              contacts: []
            };
            console.log(contacts_list);
            for(var i=0; i < contacts_list.length; i++)
            {
              if(contacts_list[i]["userid1"] == result[0]["id"])
              {
                new_obj = {
                  userid: contacts_list[i]["userid2"],
                  username: contacts_list[i]["username2"]
                }
                response.contacts.push(new_obj);
              }
              else
              {
                new_obj = {
                  userid: contacts_list[i]["userid1"],
                  username: contacts_list[i]["username1"]
                }
                response.contacts.push(new_obj);
              }
            }
            console.log(response);
            res.end(JSON.stringify(response));
          })
        }
        else
        {
          response = {
            status: 0,
            messages: []
          }
          res.end(JSON.stringify(response));
        }
      });
    }
  });
})

app.post("/get_messages", urlencodedParser, function(req, res){
  console.log("Get Message request!");
  console.log(req.body);
  var sender_id = req.body.data["sender_id"];
  var receiver_id = req.body.data["receiver_id"];
  var query = { $or:[{$and:[{sender: sender_id},{receiver: receiver_id}]}, {$and: [{sender: receiver_id},{receiver: sender_id}]}] };
  var sort_order = { createdAt: 1 };
  db.collection("messages").find(query).sort(sort_order).toArray(function(err, result){
    response = {
      messages: []
    };
    console.log(result);
    for(var i=0; i < result.length; i++)
    {
      var new_object = {};
      new_object["_id"] = result[i].sender;
      new_object["text"] = result[i].text;
      new_object["createdAt"] = result[i].createdAt;
      new_object["user"] = {};
      new_object["user"]["_id"] = result[i].sender;
      response.messages.push(new_object);
    }
    res.end(JSON.stringify(response));
  });
})

app.post("/send_messages", urlencodedParser, function(req, res){
  var messages = req.body.data.messages;
  var receiver = req.body.data.receiver;
  for(var i=0; i < messages.length; i++)
  {
    console.log(messages[i]);
    var new_object = {};
    new_object["sender"] = messages[i]["user"]["_id"];
    new_object["text"] = messages[i]["text"];
    new_object["createdAt"] = new Date();
    new_object["receiver"] = receiver;
    db.collection("messages").insertOne(new_object, function(err, res2){
      if (err) throw err;
      console.log("1 message inserted");
    });
  }
  response = {};
  res.end(JSON.stringify(response));
})

app.post("/addcontact", urlencodedParser, function (req, res){
  var userid1 = req.body.data.userid1;
  var username1 = req.body.data.username1;
  var username2 = req.body.data.username2;
  var query = { username: username2 };
  console.log(username2);
  db.collection("users").find(query).toArray(function(err, result) {
    if(result.length == 0)
    {
      response = {
        status: 0
      }
      res.end(JSON.stringify(response));
    }
    else
    {
      if(userid1 == result[0]["id"])
      {
        response = {
          status: 0
        }
        res.end(JSON.stringify(response));
      }
      var new_contact = {
        userid1: userid1,
        username1: username1,
        userid2: result[0]["id"],
        username2: username2,
      };
      db.collection("contacts").insertOne(new_contact, function(err, res2){
        if (err) throw err;
        console.log("1 contact inserted");
        response={
          status: 1,
        };
        res.end(JSON.stringify(response));
      });
    }
  })
})

var server = app.listen(20000, function () {
   var host = server.address().address
   var port = server.address().port

   console.log("Example app listening at http://%s:%s", host, port)
})
