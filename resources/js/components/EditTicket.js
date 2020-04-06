import React, { Component } from 'react';

export default class EditTicket extends Component {
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
          this.setState({ userId: this.props.ticket.user_id});
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
        this.setState({userId: event.target.value});
    }

    editTicket(){
        axios.put('/admin/ticket', {
            'id': this.props.ticket.id,
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
                    <div className="col-md-6">
                        <h3 className="text-center">Ticket {this.props.ticket.id}</h3>
                    </div>
                </div>
                <div className="row justify-content-center">
                    <div className="col-md-4">
                        <select className="form-control" onChange={this.handleSelect.bind(this)} value={this.state.userId}>
                            {this.options()}
                        </select>
                    </div>
                    <div className="col-md-2">
                        <button onClick={this.editTicket.bind(this)} className="btn btn-primary">
                            Save
                        </button>
                    </div>
                </div>
                <br/>
            </div>
        );
    }
}