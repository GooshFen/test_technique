import React, { useEffect } from 'react'
import { Link, useLocation } from 'react-router-dom'

const Lesson = () => {
    const location = useLocation()
    console.log(location.state)
    // useEffect(() => {
    //     console.log(location.state)
    // })
  return (
    <div> {location.state}</div>
  )
}

export default Lesson