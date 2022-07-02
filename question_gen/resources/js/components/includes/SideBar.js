import React,{Component} from 'react';
import {Link } from "react-router-dom";
import ReactDOM from 'react-dom';

import {Img} from 'react-image'

function SideBar () {
    return (
        <div>
            <aside className="main-sidebar sidebar-dark-primary elevation-4">

            <Link to="/home" className="brand-link">
            <Img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" className="brand-image img-circle elevation-3" />
            <span className="brand-text font-weight-light">AdminLTE 3</span>
            </Link>
            <div className="sidebar">
            <div className="user-panel mt-3 pb-3 mb-3 d-flex">
                <div className="image">
                <Img src="dist/img/user2-160x160.jpg" className="img-circle elevation-2" alt="User Image" />
                </div>
                <div className="info">
                <a href="#" className="d-block">Alexander Pierce</a>
                </div>
            </div>
            <nav className="mt-2">
                <ul className="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li className="nav-item">
                    <Link to="/home" className="nav-link">
                    <i className="nav-icon fas fa-th"></i>
                    <p>Add Question</p>
                    </Link>
                </li>
                <li className="nav-item">
                    <Link to="/Generate-Question" className="nav-link">
                    <i className="nav-icon fas fa-th"></i>
                    <p>Generate Question</p>
                    </Link>
                </li>
                <li className="nav-item">
                    <Link to="/question-list" className="nav-link">
                    <i className="nav-icon fas fa-th"></i>
                    <p>Question List</p>
                    </Link>
                </li>
                <li className="nav-item">
                    <Link to="/custom-question" className="nav-link">
                    <i className="nav-icon fas fa-th"></i>
                    <p>My Custom Question</p>
                    </Link>
                </li>
                </ul>
            </nav>
            </div>
        </aside>

        </div>
    );
}

export default SideBar;
