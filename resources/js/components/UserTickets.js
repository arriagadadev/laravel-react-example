import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import RequestTicket from './RequestTicket';

export default class UserTickets extends Component {
    constructor(props){
        super(props);
        this.state = {
            tickets: []
        };
    }

    componentDidMount(){
        this.getTickets();
    }

    getTickets(){
        axios.get('/tickets')
        .then(response => {
          this.setState({ tickets: response.data.tickets });
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    items(){
        return this.state.tickets.map((item, key) =>
            <li key={item.id} className="list-group-item">
                <strong>{item.id}</strong> - {item.requested ? (<button className="btn btn-primary" disabled>Requested</button>): (<RequestTicket refreshTable={(e) => this.refreshTable()} ticket={item}/>)}
            </li>
        );
    }

    refreshTable(){
        this.getTickets();
    }

    render(){
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Your Tickets</div>
    
                            <div className="card-body">
                                <ul className="list-group list-group-flush">
                                    { this.items() }
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('user-tickets')) {
    ReactDOM.render(<UserTickets />, document.getElementById('user-tickets'));
}