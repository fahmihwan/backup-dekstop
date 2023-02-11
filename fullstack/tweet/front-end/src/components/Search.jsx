import axios from "axios";
import React, { useCallback, useEffect, useState } from "react";
import { useDispatch } from "react-redux";
import HttpCommon from "../http-common";
import { useLoginUserMutation } from "../redux/features/authApi";

const Search = () => {
    const [name, setName] = useState("");
    const [username, setUsername] = useState("");
    const [password, setPassword] = useState("");

    const [login, { data, isLoading, error, isError, isSuccess }] = useLoginUserMutation();

    const handleClear = () => {
        setName("");
        setUsername("");
        setPassword("");
    };

    const handleLogin = async (e) => {
        e.preventDefault();
        await login({
            username: username,
            password: password,
        })
            .then((res) => {
                localStorage.setItem("token", res.data.authorization.token);
            })
            .catch((err) => console.log(err));
        handleClear();
    };

    const handleRegister = (e) => {
        e.preventDefault();
    };

    const [isLogin, setIslogin] = useState(false);
    useEffect(() => {
        let token = localStorage.getItem("token");
        console.log(token);
        if (token) {
            setIslogin(true);
        } else {
            setIslogin(false);
        }
    });

    return (
        <div className="w-4/12   relative">
            <div className="sticky flex justify-center   top-0 h-screen py-5">
                {!isLogin ? (
                    <AuthEl
                        handleLogin={handleLogin}
                        handleRegister={handleRegister}
                        name={name}
                        setName={setName}
                        username={username}
                        setUsername={setUsername}
                        password={password}
                        setPassword={setPassword}
                        handleClear={handleClear}
                    />
                ) : (
                    <SearchEl />
                )}
            </div>
        </div>
    );
};

export default Search;

const AuthEl = ({
    handleLogin,
    handleRegister,
    name,
    setName,
    username,
    setUsername,
    password,
    setPassword,
    handleClear,
}) => {
    return (
        <div className="border border-gray-700 rounded-lg w-5/6  p-5">
            {/* LOGIN */}
            <label htmlFor="login-modal" onClick={handleClear} className="btn w-full mb-5">
                Login
            </label>

            <input type="checkbox" id="login-modal" className="modal-toggle" />
            <div className="modal">
                <div className="modal-box relative">
                    <label htmlFor="login-modal" className="btn btn-sm btn-circle absolute right-2 top-2">
                        ✕
                    </label>
                    <h3 className="text-lg font-bold mb-5">Login</h3>
                    <section className=" px-5">
                        <form className="py-4" onSubmit={handleLogin}>
                            <div className="mb-5 w-full">
                                <input
                                    type="text"
                                    value={username}
                                    onChange={(e) => setUsername(e.target.value)}
                                    placeholder="Username"
                                    className="input input-bordered w-full  "
                                />
                            </div>
                            <div className="mb-5 w-full">
                                <input
                                    type="text"
                                    value={password}
                                    onChange={(e) => setPassword(e.target.value)}
                                    placeholder="Password"
                                    className="input input-bordered w-full  "
                                />
                            </div>
                            <button className="btn btn-primary w-full">Login</button>
                        </form>
                    </section>
                </div>
            </div>

            {/* LOGIN */}
            <label htmlFor="register-modal" onClick={handleClear} className="btn w-full mb-5">
                Register
            </label>

            <input type="checkbox" id="register-modal" className="modal-toggle" />
            <div className="modal">
                <div className="modal-box relative">
                    <label htmlFor="register-modal" className="btn btn-sm btn-circle absolute right-2 top-2">
                        ✕
                    </label>
                    <h3 className="text-lg font-bold mb-5">Register</h3>
                    <section className=" px-5">
                        <form className="py-4" onSubmit={handleRegister}>
                            <div className="mb-5 w-full">
                                <input
                                    type="text"
                                    value={name}
                                    onChange={(e) => setName(e.target.value)}
                                    placeholder="Name"
                                    className="input input-bordered w-full  "
                                />
                            </div>
                            <div className="mb-5 w-full">
                                <input
                                    type="text"
                                    value={username}
                                    onChange={(e) => setUsername(e.target.value)}
                                    placeholder="Username"
                                    className="input input-bordered w-full  "
                                />
                            </div>
                            <div className="mb-5 w-full">
                                <input
                                    type="text"
                                    value={password}
                                    onChange={(e) => setPassword(e.target.value)}
                                    placeholder="Password"
                                    className="input input-bordered w-full  "
                                />
                            </div>

                            <button className="btn btn-primary w-full">Register</button>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    );
};

const SearchEl = (second) => {
    return (
        <div className="form-control w-5/6 ">
            <div className="input-group ">
                <button className="btn btn-primary">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        className="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            strokeWidth="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                        />
                    </svg>
                </button>
                <input type="text" placeholder="Search…" className="input input-bordered w-full" />
            </div>
        </div>
    );
};
