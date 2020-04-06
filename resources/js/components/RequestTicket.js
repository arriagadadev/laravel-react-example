import React, { Component } from 'react';

export default class EditTicket extends Component {
    constructor(props){
        super(props);
    }

    requestTicket(){
        axios.put('/request-ticket', {
            'id': this.props.ticket.id
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
            <button onClick={this.requestTicket.bind(this)} className="btn btn-primary">
                Request
            </button>
        );
    }
}