import React, { Component } from 'react';
import {
  Container,
  Header,
  Title,
  Content,
  Button,
  Left,
  Right,
  Body,
  Icon,
  Text,
  ListItem,
  Thumbnail,
  Input,
  Item,
} from 'native-base';
let helperArray = require('./user.json');
export default class App extends Component {
  constructor(props) {
    super(props);
    this.state = {
      allUsers: helperArray,
      usersFiltered: helperArray
    };
  }

  searchUser(textToSearch) {
    this.setState({
      usersFiltered: this.state.allUsers.filter(i =>
        i.nama.toLowerCase().includes(textToSearch.toLowerCase()),
      ),
    });
  }
  render() {
    return (
      < Container >
        <Header searchBar rounded>
          <Item>
            <Icon name="search" />
            <Input
              placeholder="Pencarian"
              onChangeText={Text => {
                this.searchUser(Text);
              }}
            />
          </Item>
        </Header>
        <Content>
          {this.state.usersFiltered.map((item, index) => (
            <ListItem avatar>
              <Left>
                <Thumbnail source={{ uri: item.image }} />
              </Left>
              <Body>
                <Text>{item.nama}</Text>
                <Text note>{item.nim}</Text>
              </Body>
            </ListItem>
          ))}
        </Content>
      </ Container >
    );
  }
}