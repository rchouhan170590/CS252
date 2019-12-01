import React, { Component } from 'react';
import { StyleSheet, Text, View ,Button,TouchableOpacity} from 'react-native';

class Calulator extends Component {
  constructor()
  {
    super();
    this.state = {
      resultText : "",
      calculation : ""
    }

  }


  buttonPressed(text){
    console.log(text);
       
    if(text == '=')
    {
      //let operationList = ['*','+','-','/']
      const lc  = this.state.resultText.charAt(this.state.resultText.length-1)
      if(('*'== lc)||('+'== lc)||('-'== lc)||('/'== lc))
      //if (operationList.indexOf(lastChar) > -1)
      {
           this.setState({
                calculation : "INVALID"
           })
           return 
      }
      this.setState({
          calculation : eval(this.state.resultText)
      })
        
    }
    else
    {
      this.setState({
           resultText: this.state.resultText+text,
           calculation : ""
           
          })
    }
  }

  operationPressed(operation){
        
    if(this.state.resultText == "")
       return 
    if(operation == 'D')
    {
      this.setState({
        resultText : this.state.resultText.slice(0,-1),
        calculation : ""
      })
    }
    else
    {
      const lc  = this.state.resultText.charAt(this.state.resultText.length-1)
      if(('*'== lc)||('+'== lc)||('-'== lc)||('/'== lc))
      //if (opelist.indexOf(lastChar) > -1)
      {
           return 
      }
      else
      {
         this.setState({
            resultText: this.state.resultText+operation,
            calculation : ""

         })
       }
    }
    
  }
  render() {
    return (
      <View style={styles.container}>
         
         <View style={styles.result}>
           <Text style={styles.resultText}>{this.state.resultText}</Text>
         </View>

         <View style={styles.calculation}>
          <Text style={styles.calculationText}>{this.state.calculation}</Text>
         </View>

         <View style={styles.button}>
         
             <View style={styles.row}>
                <View style={styles.number}> 
                  <TouchableOpacity onPress={() => this.buttonPressed(1)}  style={styles.btn} >
                    <Text style={[styles.btntext,styles.whitebtn]}> 1 </Text>
                  </TouchableOpacity>
                  <TouchableOpacity onPress={() => this.buttonPressed(4)}  style={styles.btn} >
                    <Text style={[styles.btntext,styles.whitebtn]}> 4 </Text>
                  </TouchableOpacity>
                  <TouchableOpacity onPress={() => this.buttonPressed(7)}  style={styles.btn} >
                     <Text style={[styles.btntext,styles.whitebtn]}> 7 </Text>
                  </TouchableOpacity>   
                  <TouchableOpacity onPress={() => this.buttonPressed('.')}  style={styles.btn} >
                      <Text style={[styles.btntext,styles.whitebtn]}> . </Text>
                    </TouchableOpacity>
   
                </View>
                <View style={styles.number}> 
                    <TouchableOpacity onPress={() => this.buttonPressed(2)}  style={styles.btn} >
                      <Text style={[styles.btntext,styles.whitebtn]}> 2 </Text>
                    </TouchableOpacity>
                    <TouchableOpacity onPress={() => this.buttonPressed(5)}  style={styles.btn} >
                      <Text style={[styles.btntext,styles.whitebtn]}> 5 </Text>
                    </TouchableOpacity>
                    <TouchableOpacity onPress={() => this.buttonPressed(8)}  style={styles.btn} >
                      <Text style={[styles.btntext,styles.whitebtn]}> 8 </Text>
                    </TouchableOpacity> 
                    <TouchableOpacity onPress={() => this.buttonPressed(0)}  style={styles.btn} >
                      <Text style={[styles.btntext,styles.whitebtn]}> 0 </Text>
                    </TouchableOpacity>  
   
                </View> 
                <View style={styles.number}> 
                   <TouchableOpacity onPress={() => this.buttonPressed(3)}  style={styles.btn} >
                     <Text style={[styles.btntext,styles.whitebtn]}> 3 </Text>
                    </TouchableOpacity>
                    <TouchableOpacity onPress={() => this.buttonPressed(6)}  style={styles.btn} >
                      <Text style={[styles.btntext,styles.whitebtn]}> 6 </Text>
                    </TouchableOpacity>
                    <TouchableOpacity onPress={() => this.buttonPressed(9)}  style={styles.btn} >
                      <Text style={[styles.btntext,styles.whitebtn]}> 9 </Text>
                    </TouchableOpacity>   
                    <TouchableOpacity onPress={() => this.buttonPressed("=")}  style={styles.btn} >
                     <Text style={[styles.btntext,styles.whitebtn]}> = </Text>
                  </TouchableOpacity>
   
                </View>
          
                
             </View>
             <View style={styles.operation}>
              
                <TouchableOpacity onPress={() => this.operationPressed('D')}  style={styles.btn} >
                   <Text style={[styles.btntext,styles.whitebtn]}> D </Text>
                </TouchableOpacity>
                <TouchableOpacity onPress={() => this.operationPressed('*')}  style={styles.btn} >
                   <Text style={[styles.btntext,styles.whitebtn]}> * </Text>
                </TouchableOpacity>
                <TouchableOpacity onPress={() => this.operationPressed('-')}  style={styles.btn} >
                   <Text style={[styles.btntext,styles.whitebtn]}> - </Text>
                </TouchableOpacity>
                <TouchableOpacity onPress={() => this.operationPressed('+')}  style={styles.btn} >
                   <Text style={[styles.btntext,styles.whitebtn]}> + </Text>
                </TouchableOpacity>
                <TouchableOpacity onPress={() => this.operationPressed('/')}  style={styles.btn} >
                   <Text style={[styles.btntext,styles.whitebtn]}> / </Text>
                </TouchableOpacity>
             </View>
          </View>
      </View>
    );
}

}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor : '#000066',
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

export default Calulator
  