import React from 'react';
import ReactDOM from 'react-dom';
import Navbar from './includes/Navbar'
import SideBar from './includes/SideBar'
function GenerateQuestion() {
    
    return (
        <div className="wrapper">
            <Navbar />
            <SideBar />
            <div className="content-wrapper">

    {/* <!-- Main content --> */}
    <div className="content pt-5">
      <div className="container-fluid">

       
        
        
        {/* <!-- question paper field start  --> */}
        <div className="row">


          <div className="col-md-4">
            <div className="card card-primary">
              <div className="card-header">
                <h3 className="card-title">Generate Question</h3>
              </div>
              <div className="card-body">
                
                <div className="form-group">
                  <input type="text" className="form-control" placeholder="Exam Name"/>
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

          <div className="col-md-8">
            <div className="card card-primary">
              <div className="card-header">
                <div className="row justify-content-between">
                  <div className="col-sm-2">
                    <button type="button" className="btn btn-block btn-dark">Download</button>
                  </div>
                  <div className="col-sm-2">
                    <button type="button" className="btn btn-block btn-dark" id="print_btn">View</button>
                  </div>
                </div>
              </div>
              <div className="card-body" id="question_preview">
                
                {/* <!-- preview heading --> */}
                <div className="row">
                  <div className="col-12 text-center">
                    <h3>Exam Name</h3>
                    <p>Subject</p>
                    <div className="row justify-content-around">
                      <p>Time: </p>
                      <p>className</p>
                      <p>Marks: </p>
                    </div>
                  </div>
                </div>

                {/* <!-- preview body  --> */}
                <div className="row pt-3">
                  <div className="col-sm-6">
                    <ol>
                      <li>
                        <span className="text-bold">What is JavaScript ? <sub>( Dhaka Board 2019 )</sub></span>
                        <div className="row">
                          <div className="col-sm-6">
                            <p>a. Common Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>b. Machine Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>c. Programming Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>d. Assembly Language</p>
                          </div>
                        </div>
                      </li>

                      <li>
                        <span className="text-bold">What is JavaScript ?</span>
                        <div className="row">
                          <div className="col-sm-6">
                            <p>a. Common Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>b. Machine Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>c. Programming Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>d. Assembly Language</p>
                          </div>
                        </div>
                      </li>
                      
                      <li>
                        <span className="text-bold">What is JavaScript ?</span>
                        <div className="row">
                          <div className="col-sm-6">
                            <p>a. Common Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>b. Machine Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>c. Programming Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>d. Assembly Language</p>
                          </div>
                        </div>
                      </li>
                      
                      <li>
                        <span className="text-bold">What is JavaScript ?</span>
                        <div className="row">
                          <div className="col-sm-6">
                            <p>a. Common Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>b. Machine Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>c. Programming Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>d. Assembly Language</p>
                          </div>
                        </div>
                      </li>
                    </ol>
                  </div>

                  <div className="col-sm-6">
                    <ol start="5">
                      <li>
                        <span className="text-bold">What is JavaScript ?</span>
                        <div className="row">
                          <div className="col-sm-6">
                            <p>a. Common Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>b. Machine Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>c. Programming Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>d. Assembly Language</p>
                          </div>
                        </div>
                      </li>

                      <li>
                        <span className="text-bold">What is JavaScript ?</span>
                        <div className="row">
                          <div className="col-sm-6">
                            <p>a. Common Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>b. Machine Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>c. Programming Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>d. Assembly Language</p>
                          </div>
                        </div>
                      </li>
                      
                      <li>
                        <span className="text-bold">What is JavaScript ?</span>
                        <div className="row">
                          <div className="col-sm-6">
                            <p>a. Common Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>b. Machine Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>c. Programming Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>d. Assembly Language</p>
                          </div>
                        </div>
                      </li>
                      
                      <li>
                        <span className="text-bold">What is JavaScript ?</span>
                        <div className="row">
                          <div className="col-sm-6">
                            <p>a. Common Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>b. Machine Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>c. Programming Language</p>
                          </div>
                          <div className="col-sm-6">
                            <p>d. Assembly Language</p>
                          </div>
                        </div>
                      </li>
                    </ol>
                  </div>
                </div>
              </div>
              {/* <!-- /.card-body --> */}
            </div>
            {/* <!-- /.card --> */}

            <div className="card card-primary">
              <div className="card-header">
                <div className="row justify-content-between">
                  <div className="col-sm-2">
                    <button type="button" className="btn btn-block btn-dark">Download</button>
                  </div>
                  <div className="col-sm-2">
                    <button type="button" className="btn btn-block btn-dark">View</button>
                  </div>
                </div>
              </div>
              <div className="card-body">
                
                {/* <!-- preview heading --> */}
                <div className="row">
                  <div className="col-12 text-center">
                    <h3>Exam Name</h3>
                    <p>Subject</p>
                    <div className="row justify-content-around">
                      <p>Time: </p>
                      <p>className</p>
                      <p>Marks: </p>
                    </div>
                  </div>
                </div>

                {/* <!-- preview body  --> */}
                <div className="row pt-3">
                  
                  <ol>
                    <li>
                      <span className="text-bold">What is Programming Language <sub>( Dhaka Board 2019 )</sub></span>
                    </li>
                    <li>
                      <span className="text-bold">What is C# Language</span>
                    </li>
                    <li>
                      <span className="text-bold">What is Java Language</span>
                    </li>
                  </ol>
                  
                </div>
              </div>
              {/* <!-- /.card-body --> */}
            </div>
            {/* <!-- /.card --> */}
          </div>
          {/* <!-- /.col (right) --> */}

        </div>
        {/* <!-- question paper field end  --> */}

      {/* </div><!-- /.container-fluid --> */}
    </div>
    {/* <!-- /.content --> */}
  </div>
        </div>
        </div>
    );
}

export default GenerateQuestion;
