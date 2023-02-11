import { useEffect, useState } from "react";
import "./App.css";
import Home from "./components/Home";
import Nav from "./components/Nav";

function App() {
  const [theme, setTheme] = useState("");

  useEffect(() => {
    if (theme === "dark") {
      document.documentElement.classList.add("dark");
    } else {
      document.documentElement.classList.remove("dark");
    }
  }, [theme]);

  const handleTheme = () => {
    setTheme(theme === "dark" ? "light" : "dark");
  };

  return (
    <div className="bg-white dark:bg-fancy  h-screen">
      <p className="text-4xl text-red dark:text-white">Fahmi Ichwanurrohman</p>
      <Nav handleTheme={handleTheme} />
      <Home />
    </div>
  );
}

export default App;
