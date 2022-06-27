import React from 'react';
import ReactDOM from 'react-dom';
import Navbar from './includes/Navbar'
import SideBar from './includes/SideBar'
import AddQuestion from './addQuestion'
function Dashboard() {
    return (
        <div className="wrapper">
            <Navbar />
            <SideBar />
            <div class="content-wrapper">

                <section class="content pt-5" >
                    <AddQuestion />
                </section>

            </div>
        </div>
    );
}

export default Dashboard;
