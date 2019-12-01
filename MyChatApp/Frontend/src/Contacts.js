import React from 'react';
import {Platform, StyleSheet, View, KeyboardAvoidingView} from 'react-native';
import {Button, ListItem, Card} from 'react-native-elements';
import {
  Actions,
} from 'react-native-router-flux';
import axios from 'axios';

class Contacts extends React.Component
{
  state = {
      contacts: []
  };

  logout(){
    Actions.home();
  }
  
  calculator(){
    Actions.calculator();
  }


  addContacts(){
    Actions.addcontacts({
      userid: this.props.userid,
      username: this.props.username
    })
  }

  render(){
    return(
      <View style={styles.container} >
        
          <Button
            buttonStyle={{ marginTop: 20 }}
            backgroundColor="#99004d"
            title="Calculator"
            onPress={() => this.calculator()}
          />
          <Button
            buttonStyle={{ marginTop: 20 }}
            backgroundColor="#99004d"
            title="Add Contacts"
            onPress={() => this.addContacts()}
          />
        
        <Card title="Chat With">
          {
            this.state.contacts.map((item, i) => (
              <ListItem
                key={item.userid}
                title={item.username}
                bottomDivider
                chevron
                onPress = { () => {
                  Actions.chat({
                    sender_id: this.props.userid,
                    sender_name: this.props.username,
                    receiver_id: item.userid,
                    receiver_name: item.username
                  });
                }}
              />
            ))
          }
        </Card>

        <Button
            buttonStyle={{ marginTop: 20 }}
            backgroundColor="#99004d"
            title="Logout"
            onPress={() => this.logout()}
        />
      </View>
    );
  }

  componentDidMount(){
      this.setState({contacts: this.props.contacts});
    }
}

Contacts.defaultProps = {
  username: 'Rohit Chouhan',
  userid: 0,
  contacts: []
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor : '#ff66b3',
  },
});

export default Contacts;
