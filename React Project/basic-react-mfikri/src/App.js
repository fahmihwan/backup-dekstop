
import { useState } from 'react';
import './App.css';
import Body from './components/Body/Body';
import Header from './components/Header/Header';

function App() {
  const nama = "Fahmi Ichwanurrohman";
  const umur = 22;

  const [saying, setSaying] = useState('aku lagi beljar react, aku siapa?')

  const [dataLoop, setDataLoop] = useState([
    { id: null, name: '', age: null },
  ])

  const sayHello = (name) => {
    setSaying('hello nama saya adalah ' + name);

    setDataLoop([{ id: 1, name: 'fahmi', age: 23 },
    { id: 2, name: 'iwan', age: 20 },
    { id: 3, name: 'risan', age: 19 },
    { id: 4, name: 'ican', age: 32 },
    { id: 5, name: 'angga', age: 12 }])
  }

  let [body, setDataBody] = useState(
    [
      { id: 1, name: 'xxxx', age: 23 },
      { id: 2, name: 'xxx', age: 20 },
      { id: 3, name: 'x', age: 19 },
      { id: 4, name: 'xx', age: 32 },
      { id: 5, name: 'xxx', age: 12 }
    ])

  // const deleteProduct = (productId) => {
  //   const newBody = body.filter((product) => {
  //     return product.id !== productId
  //   })
  //   setDataBody(newBody)
  // }

  const deleteProduct = (productId) => {
    const newBody = body.find((product) => {
      return product.id === productId
    })
    body.splice(body.indexOf(newBody), 1);
    setDataBody(body)
  }




  // body.splice(body.indexOf(newBody), 1);
  // const newData = body;
  // setDataBody(newData)
  // console.log(newBody)




  return (
    <div >
      <Header />
      <p>hello:  {saying}  </p>
      <h1>Nama : {nama} </h1>
      <h1>umur : {umur} </h1>
      <button onClick={() => sayHello('fahmi')}>say hello</button>
      <br />
      <p>loop :</p>
      <ul >
        {
          dataLoop.map((d) => {
            return <li key={d.id} >nama {d.name}, umur {d.age}</li>
          })
        }
      </ul>

      <div className='container'>
        <Body dataBody={body} deleteProduct={deleteProduct} />
      </div>

    </div>


  );
}

export default App;
