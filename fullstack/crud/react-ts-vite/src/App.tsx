import * as React from "react";
import { createTheme, CssBaseline, IconButton, ThemeProvider, useMediaQuery, useTheme } from "@mui/material";

import { BrowserRouter, Route, Routes } from "react-router-dom";
import Login from "./pages/auth/Login";
import Register from "./pages/auth/Register";
import ListBooks from "./pages/dashboard/ListBooks";
import Index from "./pages/dashboard/Index";
import CreateBook from "./pages/dashboard/CreateBook";
import EditBooks from "./pages/dashboard/EditBooks";

function App() {
    const prefersDarkMode = useMediaQuery("(prefers-color-scheme: dark)");

    const theme = React.useMemo(
        () =>
            createTheme({
                palette: {
                    mode: !prefersDarkMode ? "dark" : "light",
                },
            }),
        [prefersDarkMode]
    );

    return (
        <BrowserRouter>
            <ThemeProvider theme={theme}>
                <CssBaseline />
                <Routes>
                    <Route path="" element={<Login />} />
                    <Route path="register" element={<Register />} />
                    <Route path="dashboard" element={<Index />}>
                        <Route path="list" element={<ListBooks />} />
                        <Route path="create" element={<CreateBook />} />
                        <Route path="update/:id" element={<EditBooks />} />
                    </Route>
                </Routes>
            </ThemeProvider>
        </BrowserRouter>
    );
}

export default App;
