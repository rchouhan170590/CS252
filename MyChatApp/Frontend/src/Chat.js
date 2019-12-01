import React from 'react';
import {Platform, StyleSheet, View, KeyboardAvoidingView} from 'react-native';
import {GiftedChat} from 'react-native-gifted-chat';
import axios from 'axios';

class Chat extends React.Component
{
  state = {
      messages: [],
  };
  constructor(props) {
    super(props);
  }

  render(){
    return(
      <View style={styles.container}>
        <GiftedChat
          messages= {this.state.messages}
          user= {{ _id: this.props.sender_id}}
          onSend={(messages) => {
            data = {
              messages: messages,
              receiver: this.props.receiver_id
            };
            axios.post('http://172.23.8.207:20000/send_messages', {data})
            .then(res => {
              this.setState(previousState => {
                return {
                  messages: GiftedChat.append(
                    previousState.messages,
                    messages
                  )
                }
              });
            })
            .catch(err => console.log(err));
          }}
          alwaysShowSend= {true}
        />
        {
          Platform.OS === 'android' && <KeyboardAvoidingView behavior="padding" keyboardVerticalOffset={75}/> //keyboardVerticalOffset={75}
        }
      </View>
    );
  }

  componentDidMount(){
    data = {
      sender_id: this.props.sender_id,
      receiver_id: this.props.receiver_id,
    };
    axios.post('http://172.23.8.207:20000/get_messages', {data})
    .then(res => {
      this.setState((previousState) => {
        return {
          messages: GiftedChat.append(previousState.messages, res.data["messages"]),
        }
      });
    })
    .catch(err => console.log(err));
    // this.setState((previousState) => {
    //     return {
    //       messages: GiftedChat.append(previousState.messages, this.props.messages),
    //     };
    //   });
    //   this.setState({userid: this.props.userid, username: this.props.username});
    }
}

Chat.defaultProps = {
  sender_id: 0,
  sender_name: 'Rohit Chouhan',
  receiver_id: 1,
  receiver_name: 'Rohit Chouhan'
};


const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor : '#ff66b3',
  },
});

export default Chat;
