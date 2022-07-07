import React,{Component, useState} from 'react';
import ReactDOM from 'react-dom';

import { ReactSearchAutocomplete } from "react-search-autocomplete";

function AddQuestion() {
  const handleOnSearch = (string, results) => {
    console.log(string, results);
  };

  const handleOnHover = (result) => {
    console.log(result);
  };

  const handleOnSelect = (item) => {
    console.log(item);
  };

  const handleOnFocus = () => {
    console.log("Focused");
  };

  const handleOnClear = () => {
    console.log("Cleared");
  };

  const movieItems = [
    {
      id: 0,
      title: "Titanic",
      description: "A movie about love",
    },
    {
      id: 1,
      title: "Dead Poets Society",
      description: "A movie about poetry and the meaning of life",
    },
    {
      id: 2,
      title: "Terminator 2",
      description: "A robot from the future is sent back in time",
    },
    {
      id: 3,
      title: "Alien 2",
      description: "Ripley is back for a new adventure",
    },
  ];


  const [selectq, setSelectq] = useState("true")

  console.log(selectq, "helllo")
    return (

        <div className="container">
            <div className="row justify-content-center">
              <div className="col-md-4">
                <div className="card card-primary">
                  <div className="card-body">
                    <div className="row align-items-center">
                      <div className="col-md-6">
                        <h3 className="card-title">Select Questions Type</h3>
                      </div>
                      <div className="col-md-6">
                        <div className="form-group mb-0">

                          <select onChange={(e)=>setSelectq(e.target.value)} className="form-control">
                            <option value={true} >MCQ</option>
                            <option value={false} >Short Ques</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div className="row justify-content-center">
                <div className="col-md-6">
                    { selectq === "true" && <div className="card card-primary">
                    <div className="card-header">
                        <h3 className="card-title">MCQ</h3>
                    </div>
                    <div className="card-body">
                    <ReactSearchAutocomplete
            items={movieItems}
            fuseOptions={{ keys: ["title", "description"] }} // Search on both fields
            resultStringKeyName="title" // String to display in the results
            onSearch={handleOnSearch}
            onHover={handleOnHover}
            onSelect={handleOnSelect}
            onFocus={handleOnFocus}
            onClear={handleOnClear}
            showIcon={false}
            styling={{
              height: "34px",
              border: "1px solid darkgreen",
              borderRadius: "4px",
              backgroundColor: "white",
              boxShadow: "none",
              hoverBackgroundColor: "lightgreen",
              color: "darkgreen",
              fontSize: "12px",
              fontFamily: "Courier",
              iconColor: "green",
              lineColor: "lightgreen",
              placeholderColor: "darkgreen",
              clearIconMargin: "3px 8px 0 0",
              zIndex: 2,
            }}
          />
                        <div className="form-group">
                        <select className="form-control">
                            <option>Question</option>
                            <option>Old Ques Match</option>
                        </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                1
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Option" />
                            <div class="input-group-append">
                                <div class="input-group-text">+</div>
                            </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Correct Ans" />
                            </div>
                    </div>
                    </div>}
                    { selectq==="false"? (<div className="card card-primary">
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
                        <div className="    form-group">
                        <input type="text" class="form-control" placeholder="Question" />
                        </div>
                        <div className="form-group">
                        <input type="text" class="form-control" placeholder="Correct Ans" />
                        </div>
                    </div>
                    </div>) : null}
                </div>
                <div className="col-md-6">
                <div className="card card-primary">
                  <div className="card-header">
                    <h3 className="card-title">Additionals</h3>
                  </div>
                  <div className="card-body">
                    <div className="row">
                      <div className="col-sm-6">
                        <div className="form-group">
                        <input type="text" class="form-control" placeholder="Subject" />
                        </div>
                      </div>
                      <div className="col-sm-6">
                        <div className="form-group">
                        <input type="text" class="form-control" placeholder="Institute" />
                        </div>
                      </div>
                      <div className="col-sm-6">
                        <div className="form-group">
                          <select className="form-control">
                            <option>Board</option>
                            <option>jessore</option>
                            <option>dhaka</option>
                          </select>
                        </div>
                      </div>
                      <div className="col-sm-6">
                        <div className="form-group">
                          <select className="form-control">
                            <option>Board year</option>
                            <option>2020</option>
                            <option>2019</option>
                            <option>2018</option>
                          </select>
                        </div>
                      </div>
                      <div className="col-sm-6">
                        <div className="form-group">
                          <select className="form-control">
                            <option>className</option>
                            <option>className 5</option>
                            <option>className 6</option>
                            <option>className 7</option>
                          </select>
                        </div>
                      </div>
                      <div className="col-sm-6">
                        <div className="form-group">
                          <select className="form-control">
                            <option>Status</option>
                            <option>easy</option>
                            <option>hard</option>
                            <option>medium</option>
                          </select>
                        </div>
                      </div>
                      <div className="col-sm-6">
                        <div className="form-group">
                          <select className="form-control">
                            <option>Question Term</option>
                            <option>Test</option>
                            <option>Midterm</option>
                            <option>Final</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div className="row pb-5 justify-content-center">
              <div className="col-sm-4">
                <button type="button" className="btn btn-block btn-primary">Submit</button>
              </div>
            </div>
        </div>
    );
}

export default AddQuestion;
