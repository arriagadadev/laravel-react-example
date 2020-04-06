import React, { Component } from 'react';

export default class CreateTicket extends Component {
    constructor(props){
        super(props);
        this.state = {
            users: [],
            userId : 0
        };
    }

    componentDidMount(){
        this.getUsers();
    }

    getUsers(){
        axios.get('/users')
        .then(response => {
          this.setState({ users: response.data.users });
          this.setState({ userId: this.state.users[0].id});
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    options(){
        return this.state.users.map((item, key) =>
            <option key={item.id} value={item.id}>{item.name}</option>
        );
    }

    handleSelect(event){
        event.persist();
        process.nextTick(() => {
            this.setState({userId: event.target.value});
        });
    }

    createTicket(){
        axios.post('/admin/ticket', {
            'user_id': this.state.userId
        })
        .then(response => {
          this.props.refreshTable();
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    render(){
        return (
            <div className="container-fluid">
                <div className="row justify-content-center">
                    <div className="col-md-4">
                        <select className="form-control" onChange={this.handleSelect.bind(this)} value={this.userId}>
                            {this.options()}
                        </select>
                    </div>
                    <div className="col-md-2">
                        <button onClick={this.createTicket.bind(this)} className="btn btn-primary">
                            Create
                        </button>
                    </div>
                </div>
                <br/>
            </div>
        );
    }
}