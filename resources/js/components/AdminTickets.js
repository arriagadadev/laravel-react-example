import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import CreateTicket from './CreateTicket';
import EditTicket from './EditTicket';

export default class AdminTickets extends Component {
    constructor(props){
        super(props);
        this.state = {
            tickets: [],
            users: [],
            showCreate: false,
            showEdit: false,
            ticketBeingEdited: {}
        };
    }

    componentDidMount(){
        this.getTickets();
    }

    getTickets(){
        axios.get('/admin/tickets')
        .then(response => {
          this.setState({ tickets: response.data.tickets });
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    delete(item){
        if(confirm("Are you sure?")){
            axios.delete('/admin/ticket/' + item.id)
            .then(response => {
                this.getTickets();
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    }

    edit(item){
        document.documentElement.scrollTop = 0;
        this.setState({showEdit: true, ticketBeingEdited: item});
        if(this.state.showCreate){
            this.setState({showCreate: false});
        }
    }

    items(){
        return this.state.tickets.map((item, key) =>
            <tr key={item.id}>
                <th scope="row">{item.id}</th>
                <td>{item.user_name}</td>
                <td>{item.requested ? 'Requested':'Not requested'}</td>
                <td>
                    <i onClick={(e) => this.edit(item)} className="fa fa-pencil"></i>
                    <i onClick={(e) => this.delete(item)} className="fa fa-trash"></i>
                </td>
            </tr>
        );
    }

    changeShowCreate(){
        this.setState({showCreate: !this.state.showCreate, showEdit: false});
    }

    refreshTable(){
        this.getTickets();
        this.setState({showCreate: false, showEdit: false});
    }

    render(){
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Tickets <i onClick={this.changeShowCreate.bind(this)} className="fa fa-plus"></i></div>
    
                            <div className="card-body">
                                {this.state.showCreate && (<CreateTicket refreshTable={(e) => this.refreshTable()}/>)}
                                {this.state.showEdit && (<EditTicket ticket={this.state.ticketBeingEdited} refreshTable={(e) => this.refreshTable()}/>)}
                                <table className="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">User</th>
                                            <th scope="col">State</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        { this.items() }
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('admin-tickets')) {
    ReactDOM.render(<AdminTickets />, document.getElementById('admin-tickets'));
}