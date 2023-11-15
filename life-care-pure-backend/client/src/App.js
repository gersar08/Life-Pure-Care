import React from 'react';
import Header from './components/Header';
import '../src/styles/App.css';
import Login from './components/Login';
import AdminDashboard from './components/dashboards/AdminDashboard';

function App() {
  return (
    <div className="App">
      <header className="App-header">
        <Header />
      </header>
      <div className='App-body'>
        <Login />
        <div className='Dashboard'>
        <AdminDashboard />
        </div>
      </div>
    </div>
  );
}

export default App;
