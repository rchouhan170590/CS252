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


class AddContacts extends React.Component
{
  state = {
    new_user: "",
  }

  addcontact = () => {
    const data = {
      userid1: this.props.userid,
      username1: this.props.username,
      username2: this.state.new_user
    };
    axios.post('http://172.23.8.207:20000/addcontact', { data })
      .then(res => {
        if(res.data["status"] == 1)
        {
          alert("User added to Contacts");
        }
        else
        {
          alert("Requested User Does not exist");
        }
      })
      .catch(err => console.log(err));
  }

  render(){
    return(
      <View style={styles.container}>
        <Card title="Add Contacts">
          <Input label= "Username to add"
            placeholder="Username..."
            onChangeText={value => this.setState({ new_user: value })}
          />
          <Button
            buttonStyle={{ marginTop: 20 }}
            backgroundColor="#03A9F4"
            title="Add to Contacts"
            onPress={() => this.addcontact()}
          />
        </Card>
      </View>
    )
  }
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor : '#000066',
  },

});

export default AddContacts;
