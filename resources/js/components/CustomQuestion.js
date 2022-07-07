import React from 'react';
import ReactDOM from 'react-dom';
import Navbar from './includes/Navbar'
import SideBar from './includes/SideBar'
function CustomQuestion() {
    return (
        <div className="wrapper">
            <Navbar />
            <SideBar />
            <div className="content-wrapper">

                <section className="content pt-5">
                    <div className="container-fluid">




                        {/* <!-- question paper field start  --> */}
                        <div className="row">


                            <div className="col-md-6">
                                <div className="card card-primary">
                                    <div className="card-header">
                                        <h3 className="card-title">Generate Question</h3>
                                    </div>
                                    <div className="card-body">

                                        <div className="form-group">
                                            <input type="text" className="form-control" placeholder="Exam Name" />
                                        </div>

                                        <div className="row">
                                            <div className="col-sm-4">
                                                <select className="form-control">
                                                    <option>className</option>
                                                    <option>className 5</option>
                                                    <option>className 6</option>
                                                    <option>className 7</option>
                                                    <option>className 8</option>
                                                </select>
                                            </div>
                                            <div className="col-sm-4">
                                                <select className="form-control">
                                                    <option>Status</option>
                                                    <option>easy</option>
                                                    <option>middle</option>
                                                    <option>hard</option>
                                                </select>
                                            </div>

                                            <div className="col-sm-4">
                                                <div className="form-group">
                                                    <input type="text" className="form-control" placeholder="Marks" />
                                                </div>
                                            </div>
                                        </div>

                                        <div className="row">
                                            <div className="col-sm-6">
                                                <div className="form-group">
                                                    <input type="text" className="form-control" placeholder="Ques Limit" />
                                                </div>
                                            </div>
                                            <div className="col-sm-6">
                                                <div className="form-group">
                                                    <input type="text" className="form-control" placeholder="Subject" />
                                                </div>
                                            </div>
                                        </div>

                                        <div className="row">
                                            <div className="col-sm-6">
                                                <div className="form-group">
                                                    <select className="form-control">
                                                        <option>Ques Type</option>
                                                        <option>MCQ</option>
                                                        <option>Short question</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div className="col-sm-6">
                                                <div className="form-group">
                                                    <input type="text" className="form-control" placeholder="Time" />
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    {/* <!-- /.card-body --> */}
                                </div>
                                {/* <!-- /.card --> */}
                            </div>
                            {/* <!-- /.col (right) --> */}

                            <div className="col-md-6">
                                {/* <!-- question paper field start  --> */}
                                <div className="row justify-content-center">
                                    <div className="col-md-12">
                                        <div className="card card-primary">
                                            <div className="card-body">
                                                <div className="row align-items-center">
                                                    <div className="col-md-6">
                                                        <h3 className="card-title">Select Questions Type</h3>
                                                    </div>
                                                    <div className="col-md-6">
                                                        {/* <!-- select --> */}
                                                        <div className="form-group mb-0">
                                                            <select className="form-control">
                                                                <option>MCQ</option>
                                                                <option>Short Ques</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {/* <!-- /.card-body --> */}
                                        </div>
                                        {/* <!-- /.card --> */}
                                    </div>
                                    {/* <!-- /.col (right) --> */}
                                </div>
                                {/* <!-- question paper field end  --> */}
                                {/* <!-- question paper field start  --> */}
                                <div className="row">
                                    <div className="col-12">
                                        <div className="card card-primary">
                                            <div className="card-header">
                                                <h3 className="card-title">MCQ</h3>
                                            </div>
                                            <div className="card-body">
                                                <div className="form-group">
                                                    <select className="form-control">
                                                        <option>Question</option>
                                                        <option>Old Ques Match</option>
                                                    </select>
                                                </div>
                                                <div className="input-group mb-3">
                                                    <div className="input-group-prepend">
                                                        <span className="input-group-text">
                                                            1
                                                        </span>
                                                    </div>
                                                    <input type="text" className="form-control" placeholder="Option" />
                                                    <div className="input-group-append">
                                                        <div className="input-group-text">+</div>
                                                    </div>
                                                </div>
                                                <div className="form-group">
                                                    <input type="text" className="form-control" placeholder="Correct Ans" />
                                                </div>
                                            </div>
                                            {/* <!-- /.card-body --> */}
                                        </div>
                                        {/* <!-- /.card --> */}
                                        <div className="card card-primary">
                                            <div className="card-header">
                                                <h3 className="card-title">Short Ques</h3>
                                            </div>
                                            <div className="card-body">
                                                <div className="form-group">
                                                    <select className="form-control">
                                                        <option>Question</option>
                                                        <option>Old Ques Match</option>
                                                    </select>
                                                </div>
                                                <div className="form-group">
                                                    <input type="text" className="form-control" placeholder="Question" />
                                                </div>
                                                <div className="form-group">
                                                    <input type="text" className="form-control" placeholder="Correct Ans" />
                                                </div>
                                            </div>
                                            {/* <!-- /.card-body --> */}
                                        </div>
                                        {/* <!-- /.card --> */}
                                    </div>
                                    {/* <!-- /.col (right) --> */}
                                </div>
                                <div className="row pb-5">
                                    <div className="col-12">
                                        <button type="button" className="btn btn-block btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                            {/* <!-- /.col (right) --> */}

                        </div>
                        {/* <!-- question paper field end  --> */}

                        {/* </div><!-- /.container-fluid --> */}
                        </div>
                </section>
                

            </div>
        </div>

    );
}

export default CustomQuestion;
