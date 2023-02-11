import { Box, Container, Typography } from "@mui/material";
import React from "react";
import { Outlet } from "react-router-dom";

const Index = () => {
    return (
        <div>
            <Box sx={{ backgroundColor: "blueviolet", paddingLeft: "20px" }}>
                <Typography variant="h4">Books App</Typography>
            </Box>
            <Container sx={{ paddingTop: "40px" }}>
                <Outlet />
            </Container>
        </div>
    );
};

export default Index;
