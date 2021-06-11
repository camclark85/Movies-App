import React from "react";
import RaisedButton from "material-ui/RaisedButton";
import SelectField from "material-ui/SelectField";
import MenuItem from "material-ui/MenuItem";
import "./App.css";
import configData from "./config.json";

class MoviesContainer extends React.Component {

  constructor() {
    super();

    this.state = {
        error: '',
        genreArr: [],
        genre: 0,
        movie: {
            id: null,
            title: '',
            desc: '',
            image: ''
        }
    };
  }

  componentDidMount() {
    this.initDropDown();
  }

  /**
   * Retrieve genres from API and initialize options
   */
  initDropDown() {
    fetch(`${configData.API_SERVER}:${configData.API_PORT}/api/genres`, {
        method: 'GET',
        headers: new Headers({
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }),
    })
    .then(response => response.json())
    .then(data => {
        this.setState({genreArr: data});
    })
    .catch(error => {
        console.log('Error fetching and parsing data', error);
    });
  }

  /**
   * Deal with genre change
   */
  handleChange = (event, index, value) => {
    let errorMsg = '';
    if( value === 0 ){
        errorMsg = 'You must select a genre.';
    } 
    this.setState({
        genre: value,
        error: errorMsg
    });
  }

  /**
   * Handle form submission
   * validate selection and call API
   */
  handleSubmit = (e) => {
    e.preventDefault();

    let genre = this.state.genre;
    if( genre === 0 ){
        this.setState({error: 'You must select a genre.'});
    } else {
        this.setState({error: ''});

        let apiReq = `${configData.API_SERVER}:${configData.API_PORT}/api/movies/${genre}`;
        if( this.state.movie.id != null ){
            apiReq = `${configData.API_SERVER}:${configData.API_PORT}/api/movies/${genre}/${this.state.movie.id}`;
        }

        fetch(apiReq, {
                method: 'GET',
                headers: new Headers({
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }),
            })
            .then(response => response.json())
            .then(data => {
                //console.log(data);
                this.setState({
                    movie: data
                });
            })
            .catch(error => {
                console.log('Error fetching and parsing data', error);
            });
    }

  }

  render() {
    return (
      <div>
        <div className="movieBox">
            <h1>My Movie App</h1>
        
            <div className="alignWrapper">
                <form>
                    <div className="fieldWrapper">
                    <SelectField
                        name="genre"
                        floatingLabelText="Movie Genre"
                        value={this.state.genre}
                        onChange={this.handleChange}
                        errorText={this.state.error}
                        >
                        { this.state.genreArr.map((genre) => 
                            <MenuItem key={genre.id} value={genre.id} primaryText={genre.name} /> 
                        )}
                    </SelectField>

                    <br />
                    <RaisedButton
                        className="formSubmit"
                        primary={true}
                        type="submit"
                        label="submit"
                        onClick={this.handleSubmit}
                    />
                    </div>
                </form>
                {this.state.movie.id != null ?
                    <div className="resultBox">
                        <div className="resultImg"><img src={`../img/${this.state.movie.image}`} alt=""></img></div>
                        <div className="resultTitle"><strong>{this.state.movie.title}</strong></div>
                        <div className="resultDesc">{this.state.movie.desc}</div>
                    </div>
                : ''}
            </div>                    
        </div>

      </div>
    );
  }
}

export default MoviesContainer;
