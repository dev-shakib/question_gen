import React from 'react';
import ReactDOM from 'react-dom';
import About from './includes/FRONTEND/About'
import Footer from './includes/FRONTEND/Footer'
import CTA from './includes/FRONTEND/CTA'
import Banner from './includes/FRONTEND/Banner'
import Header from './includes/FRONTEND/Header'
function Dashboard() {
    return (
        <>
        <Header />
        <Banner />
        <CTA />
        <About />
        <Footer />
        </>
    );
}

export default Dashboard;
