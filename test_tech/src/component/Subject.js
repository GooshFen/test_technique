import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom'


export default function Subject() {
    const [subjects, setSubjects] = useState([]);

    useEffect(() => {
       fetch('https://127.0.0.1:8000/api/subjects')
          .then((response) => response.json())
          .then((data) => {
            //  console.log(data['hydra:member']);
             setSubjects(data['hydra:member']);
          })
          .catch((err) => {
             console.log(err.message);
          });
    }, []);
    
   // const findId = (e) => {
   //    e.preventDefault()
   //    console.log(e)
   // }
  

 return (
   <div> 
      {subjects.map(
         subject => <Link to={`/lesson`} state={subject.id}> {subject.name} </Link>
      )}
  </div>
 );
  
}
