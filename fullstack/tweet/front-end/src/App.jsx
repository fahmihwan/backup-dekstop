import { Link, Route, Routes } from "react-router-dom";
import "./App.css";
import Search from "./components/Search";
import Sidebar from "./components/Sidebar";
import Home from "./pages/Home";
function App() {
    return (
        <div className="bg-black  text-white">
            <div className="w-full flex">
                <Sidebar />
                <Routes>
                    <Route path="/" element={<Home />} />
                </Routes>
                <Search />
            </div>
        </div>
    );
}

export default App;
