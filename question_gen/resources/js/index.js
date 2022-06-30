import React from 'react';
import ReactDOM from 'react-dom';
import Dashboard from './components/Dashboard';
import GenerateQuestion from './components/GenerateQuestion';
import QuestionList from './components/QuestionList';
import CustomQuestion from './components/CustomQuestion';
import HomePage from './components/HomePage';
import LoginPage from './components/LoginPage';
import { BrowserRouter, Route, Routes } from "react-router-dom";
if (document.getElementById('AdminApp')) {
    ReactDOM.render(<BrowserRouter>
        <Routes>
         <Route exact path="/" element={<HomePage />} />
         <Route exact path="/login" element={<LoginPage />} />
         <Route exact path="/home" element={<Dashboard />} />
         <Route exact  path="/Generate-Question" element={<GenerateQuestion />} />
         <Route exact  path="/question-list" element={<QuestionList />} />
         <Route exact  path="/custom-question" element={<CustomQuestion />} />
       </Routes>
       </BrowserRouter>, document.getElementById('AdminApp'));
}
