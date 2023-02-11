import { Box, Button, Container, FormControl, Stack, TextField, Typography } from "@mui/material";
import React, { useState } from "react";
import { Link } from "react-router-dom";

const Register = () => {
    const [name, setName] = useState("");
    const [username, setUsername] = useState("");
    const [password, setPassword] = useState("");
    return (
        <Container>
            <Stack direction="row" height={"100vh"} justifyContent="center" alignItems="center" spacing={2}>
                <Box
                    sx={{
                        border: "2px solid",
                        borderColor: "blueviolet",
                        borderRadius: "10px",
                        width: "400px",
                        padding: "20px",
                    }}
                >
                    <form action="">
                        <Typography variant="h3" sx={{ textAlign: "center" }}>
                            Register
                        </Typography>
                        <FormControl fullWidth margin="normal">
                            <TextField
                                value={name}
                                onChange={(e) => setName(e.target.value)}
                                id="outlined-basic"
                                label="name"
                                variant="outlined"
                            />
                        </FormControl>
                        <FormControl fullWidth margin="normal">
                            <TextField
                                value={username}
                                onChange={(e) => setUsername(e.target.value)}
                                id="outlined-basic"
                                label="username"
                                variant="outlined"
                            />
                        </FormControl>
                        <FormControl fullWidth margin="normal">
                            <TextField
                                value={password}
                                onChange={(e) => setPassword(e.target.value)}
                                id="outlined-basic"
                                label="password"
                                variant="outlined"
                            />
                        </FormControl>
                        <Box sx={{ padding: "30px 0px 20px 0px" }}>
                            <Button
                                fullWidth
                                sx={{
                                    color: "white",
                                    marginBottom: "10px",
                                    backgroundColor: "blueviolet",
                                }}
                            >
                                Register
                            </Button>
                            <Link to="/">
                                <Typography sx={{ color: "lightcyan", textAlign: "center" }}>
                                    U have Account ?
                                </Typography>
                            </Link>
                        </Box>
                    </form>
                </Box>
            </Stack>
        </Container>
    );
};

export default Register;
