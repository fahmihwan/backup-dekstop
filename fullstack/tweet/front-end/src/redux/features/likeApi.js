import { createApi, fetchBaseQuery } from "@reduxjs/toolkit/dist/query/react";
import HttpCommon from "../../http-common";

export const likeApi = createApi({
    reducerPath: "likeApi",
    baseQuery: fetchBaseQuery({
        baseUrl: HttpCommon.baseURL,
    }),
    endpoints: (builder) => ({
        createLike: builder.mutation({
            query: (data) => ({
                url: "/like",
                method: "POST",
                body: data,
            }),
        }),
    }),
});

export const { useCreateLikeMutation } = likeApi;
