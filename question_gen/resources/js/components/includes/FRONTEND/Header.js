import React from 'react';
import ReactDOM from 'react-dom';
import {Link } from "react-router-dom";
import {Img} from 'react-image'
function Header() {
    return (
        <header className="header-sec" id="header">
        <div className="container">
            <nav className="p-relative">
                <div className="menu-bar d-block d-lg-none" id="menu-bar">
                    <button><i className="fas fa-bars"></i></button>
                </div>
                <div className="row mobile-row align-center">
                    <div className="col-2 col-lg-2 logo">
                        <a href="index.html">
                            <Img src="front/images/logo.png" alt="logo" />
                        </a>
                    </div>
                    <div className="col-12 col-lg-7 d-lg-block mobile-ver" id="menu">
                        <div className="menu">
                            <ul>
                                <li><Link to="/login">শিক্ষক লগইন</Link></li>
                                <li><Link to="/login">শিক্ষার্থী লগইন</Link></li>
                                <li><Link to="#">ডকুমেন্টেশন</Link></li>
                                <li><Link to="#">লাইভ সার্পোট</Link></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    );
}

export default Header;
