import React, { Component } from 'react';
import { Platform, StyleSheet, Text, View } from 'react-native';
import Home from "./src/Home";
import Chat from "./src/Chat";
import Contacts from "./src/Contacts";
import Calculator from "./src/Calculator";
import AddContacts from "./src/AddContacts";
import { AppLoading } from 'expo';
import { Root, Container, Header, Left, Body, Right, Title } from 'native-base';
import * as Font from 'expo-font';
import Roboto from 'native-base/Fonts/Roboto.ttf';
import RobotoMedium from 'native-base/Fonts/Roboto_medium.ttf';
import {
  Router,
  Scene
} from 'react-native-router-flux';

class App extends Component {
  state = {
    appLoaded: false // Load fonts before rendering the main app
  };

  async componentDidMount() {
    await Expo.Font.loadAsync({
    'Roboto': require('native-base/Fonts/Roboto.ttf'),
    'Roboto_medium': require('native-base/Fonts/Roboto_medium.ttf'),
   });
   this.setState({ appLoaded: true });
  }

  render() {
    if (!this.state.appLoaded)
      return (
        <Root>
          <AppLoading />
        </Root>
      );
    else
      return (

          <Router>
            <Scene key="root" panHandlers={null}>
              <Scene key="home" component={Home} title="Login" type="reset" hideNavBar/>
              <Scene key="chat" component={Chat} title="Chat" />
              <Scene key="contacts" component={Contacts} title="Contacts" type="reset" hideNavBar/>
              <Scene key="calculator" component={Calculator} title="Calculator" />
              <Scene key="addcontacts" component={AddContacts} title="Add Contacts" />
            </Scene>
          </Router>
      );
  }
}
export default App;
