import React from 'react'

const Body = ({ dataBody, deleteProduct }) => {


    return (
        <div>
            <div>component body</div>
            <ul>
                {dataBody.map((d) => {
                    return <li key={d.id} > {d.name} - {d.age} <button onClick={() => deleteProduct(d.id)}>Del</button></li>
                })}
            </ul>
        </div >
    )
}

export default Body