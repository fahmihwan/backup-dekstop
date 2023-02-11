import React from 'react'
import styled from 'styled-components';

const Home = () => {


    const ImageBackground = styled.div`
    border-radius:50% 50% 47% 53% / 74% 68% 32% 26%  ;
    background:red;
    height:250px;
    width:250px;
    position:relative;
    display: flex;
    align-items: center;
    background: rgb(255,255,255);
    background: linear-gradient(200deg, rgba(255,255,255,1) 0%, rgba(208,7,157,1) 0%, rgba(213,57,241,1) 38%, rgba(43,0,204,1) 98%);
  `;


    return (
        <div className='flex'>
            <div className='w-8/12 border'>sds</div>
            <div className='w-4/12 border '>
                <ImageBackground>
                    <img
                        className='w-60'
                        alt="Lightning"
                        src="/foto-profile/fahmi.png" />
                </ImageBackground>
            </div>

        </div>
    )
}

export default Home