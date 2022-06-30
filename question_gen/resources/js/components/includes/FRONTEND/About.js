import React from 'react';
import ReactDOM from 'react-dom';
import {Img} from 'react-image'
function About() {
    return (
        <section className="about-sec sec-padding">
        <div className="container">
            <div className="title">
                <h2>ফিচার <span>সমূহ</span></h2>
            </div>
            <div className="row align-center justify-start justify-xl-center">
                <div className="col-12 col-md-6 col-md-4 col-lg-4 d-md-flex justify-md-end">
                    <div className="about-list list-ltr">
                        <ul>
                            <li>
                                <span>প্রশ্ন বানানোর সুবিধা</span>
                                <span className="list-icon"><i className="fas fa-mobile-alt"></i></span>
                            </li>
                            <li>
                                <span>এক ক্লিকেই প্রশ্ন তৈরি</span>
                                <span className="list-icon"><i className="fas fa-copy"></i></span>
                            </li>
                            <li>
                                <span>সময় সাশ্রয়ী</span>
                                <span className="list-icon"><i className="fas fa-list-alt"></i></span>
                            </li>
                            <li>
                                <span>নতুনদের জন্য ব্যবহার সুবিধা</span>
                                <span className="list-icon"><i className="fas fa-dollar-sign"></i></span>
                            </li>
                            <li>
                                <span>সমস্যা শেয়ার</span>
                                <span className="list-icon"><i className="fas fa-search-dollar"></i></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div className="col-12 col-md-4 d-none d-lg-block">
                    <div className="about-img">
                        <Img src="front/images/service.png" alt="image" />
                    </div>
                </div>
                <div className="col-12 col-md-6 col-md-4 col-lg-4">
                    <div className="about-list list-rtl">
                        <ul>
                            <li>
                                <span className="list-icon"><i className="fas fa-mobile-alt"></i></span>
                                <span>প্রশ্ন বানানোর সুবিধা</span>

                            </li>
                            <li>
                                <span className="list-icon"><i className="fas fa-copy"></i></span>
                                <span>এক ক্লিকেই প্রশ্ন তৈরি</span>
                            </li>
                            <li>
                                <span className="list-icon"><i className="fas fa-list-alt"></i></span>
                                <span>সময় সাশ্রয়ী</span>
                            </li>
                            <li>
                                <span className="list-icon"><i className="fas fa-dollar-sign"></i></span>
                                <span>নতুনদের জন্য ব্যবহার সুবিধা</span>
                            </li>
                            <li>
                               <span className="list-icon"><i className="fas fa-search-dollar"></i></span>
                               <span>সমস্যা শেয়ার</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    );
}

export default About;
