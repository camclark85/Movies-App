import './App.css';
import React from 'react';
import MuiThemeProvider from "material-ui/styles/MuiThemeProvider";
import MoviesForm from './MoviesForm';

function App() {
  
  return(
    <MuiThemeProvider>
      <MoviesForm />
    </MuiThemeProvider>
  )
}

export default App;
