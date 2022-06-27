import React from 'react';
import ReactDOM from 'react-dom';
import Dashboard from './components/Dashboard';
import GenerateQuestion from './components/GenerateQuestion';
import QuestionList from './components/QuestionList';
import CustomQuestion from './components/CustomQuestion';
import { BrowserRouter, Route, Routes } from "react-router-dom";
if (document.getElementById('app')) {
    ReactDOM.render(<BrowserRouter>
        <Routes>
         <Route exact path="/home" element={<Dashboard />} />
         <Route exact  path="/Generate-Question" element={<GenerateQuestion />} />
         <Route exact  path="/question-list" element={<QuestionList />} />
         <Route exact  path="/custom-question" element={<CustomQuestion />} />
       </Routes>
       </BrowserRouter>, document.getElementById('app'));
}
