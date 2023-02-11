import { Box, Button, FormControl, TextField, Typography } from "@mui/material";
import React, { useState } from "react";
import { Link } from "react-router-dom";

const CreateBook = () => {
    const [title, setTitle] = useState<string>("");
    const [author, setAuthor] = useState<string>("");

    return (
        <Box sx={{ width: "400px" }}>
            <Box sx={{ display: "flex", justifyContent: "space-between" }}>
                <Typography variant="h6">Create Books</Typography>
                <Link to="/dashboard/list">
                    <Button variant="outlined">Kembali</Button>
                </Link>
            </Box>
            <form action="">
                <FormControl fullWidth margin={"normal"}>
                    <TextField
                        value={title}
                        onChange={(e) => setTitle(e.target.value)}
                        id="outlined-basic"
                        label="title"
                        variant="outlined"
                    />
                </FormControl>
                <FormControl fullWidth margin={"normal"}>
                    <TextField
                        value={author}
                        onChange={(e) => setAuthor(e.target.value)}
                        id="outlined-basic"
                        label="author"
                        variant="outlined"
                    />
                </FormControl>
                <Button variant="contained">Submit</Button>
            </form>
        </Box>
    );
};

export default CreateBook;
