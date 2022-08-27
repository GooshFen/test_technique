import logo from './logo.svg';
import Subject from './component/Subject'
import './App.css';
import { Routes, Route, useLocation } from 'react-router-dom';
import { Navbar, Lesson} from './component';
import { useState, useEffect } from 'react';



function App(props) {
  // Récupérer l'id de la matière cliquée pour récupèrer les cours'.
  // const [students, setStudents] = useState([]);
    
  // useEffect(() => {
  //    fetch('https://127.0.0.1:8000/api/students')
  //       .then((response) => response.json())
  //       .then((data) => {
  //          console.log(data['hydra:member']);
  //          setStudents(data['hydra:member']);
  //       })
  //       .catch((err) => {
  //          console.log(err.message);
  //       });
  // }, []);
  

  return (
    <div className='app'>
      <Navbar />
      
      <div className='container'>
          <Routes>
            <Route path='/' element={<Subject />}/>
            <Route path='/lesson' element={<Lesson />} />
          </Routes>
      </div>
    </div>
  );
}

export default App;
