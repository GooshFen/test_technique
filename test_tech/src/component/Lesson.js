import React, { useEffect, useState } from 'react'
import { Link, useLocation } from 'react-router-dom'

const Lesson = () => {
    const location = useLocation()
    const [lessons, setLessons] = useState([]);

    useEffect(() => {
       fetch('http://127.0.0.1:8000/api/subjects/' + location.state)
          .then((response) => response.json())
          .then((data) => {
            console.log(data);
            setLessons(data);
          })
          .catch((err) => {
             console.log(err.message);
          });
    }, []);
  return (
    <div> {location.state}</div>
  )
}

export default Lesson