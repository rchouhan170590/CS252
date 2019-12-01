import React from 'react';
import {
  View,
  Text,
  StyleSheet,
} from 'react-native';

import { Card, Button, Input } from 'react-native-elements';
import {
  Actions,
} from 'react-native-router-flux';
import axios from 'axios';


class Home extends React.Component
{
  state = {
    username: "",
    password: ""
  }

  signup = () => {
    const data = {
      username: this.state.username,
      password: this.state.password
    };
    axios.post('http://172.23.8.207:20000/signup', { data })
      .then(res => {
        alert(res.data["message"]);
      })
      .catch(err => console.log(err));
  }

  login = () => {
    const data = {
      username: this.state.username,
      password: this.state.password
    }
    axios.post('http://172.23.8.207:20000/login', {data})
    .then(res => {
      if(res.data["status"] == 0)
      {
        alert("Incorrect Username or Password");
      }
      else
      {
        Actions.contacts({
          username: res.data["username"],
          userid: res.data["userid"],
          contacts: res.data["contacts"]
        });
      }
    })
    .catch(err => console.log(err));
  }

  render(){
    return(
      <View style={styles.container}>
        
          <Input label= "Username"
            placeholder="Username..."
            onChangeText={value => this.setState({ username: value })}
          />
          <Input secureTextEntry label= "Password"
             placeholder="Password..."
             onChangeText={value => this.setState({ password: value })}
          />
          <Button
            buttonStyle={{ marginTop: 20 }}
            backgroundColor="#b30059"
            title="SIGN IN"
            onPress={() => this.login()}
          />
          <Button
            buttonStyle={{ marginTop: 20 }}
            backgroundColor="#b30059"
            title="SIGN UP"
            onPress={() => this.signup()}
          />
      </View>
    )
  }
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor : '#ffb3d9',
  },
  
  result : {
    flex : 2,
    backgroundColor : '#000066',
    alignItems : 'flex-end',
    justifyContent : 'center',
  },

  calculation : {
    flex : 1,
    backgroundColor : '#000080',
    alignItems : 'flex-end',
    justifyContent : 'center',
  },

  button : {
    flex : 7,
    flexDirection : 'row',
  },
  number : {
    
    flex  : 7,
    backgroundColor : '#000080',
  },
  operation : {
    flex  : 1,
    backgroundColor : '#000033', 
    justifyContent : 'space-around',
    
  },
  row : {
    flex : 4 , 
    flexDirection : 'row',
    alignItems : 'center', 
    justifyContent : 'space-around',
  },

  calculationText : {
    flex : 1,
    fontSize  : 24,
    color : 'white',
  },
  resultText : {
    flex : 2,
    
    fontSize : 30,
    color : 'white',
  },

  btn : {
      alignItems : 'center',
   },

  btntext : {
     fontSize : 30,
  },
  whitebtn : {
    color : "white",
  },
});

export default Home;
