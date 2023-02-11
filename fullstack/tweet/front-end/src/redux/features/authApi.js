import { createApi, fetchBaseQuery } from "@reduxjs/toolkit/dist/query/react";
import HttpCommon from "../../http-common";

export const authApi = createApi({
    reducerPath: "authApi",
    baseQuery: fetchBaseQuery({
        baseUrl: HttpCommon.baseURL,
    }),
    endpoints: (builder) => ({
        loginUser: builder.mutation({
            query: (data) => ({
                url: "/user/login",
                method: "POST",
                body: data,
            }),
        }),
        logoutUser: builder.mutation({
            query: (data) => ({
                url: "/user/logout",
                method: "POST",
                body: data,
            }),
        }),
        registerUser: builder.mutation({
            query: () => ({
                url: "/user/register",
                method: "POST",
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                    Authorization: "Bearer " + localStorage.getItem("token"),
                },
            }),
        }),
    }),
});

export const { useLoginUserMutation, useLogoutUserMutation, useRegisterUserMutation } = authApi;
