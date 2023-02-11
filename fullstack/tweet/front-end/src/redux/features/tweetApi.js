import { createApi, fetchBaseQuery } from "@reduxjs/toolkit/query/react";
import HttpCommon from "../../http-common";

export const tweetApi = createApi({
    reducerPath: "tweetApi",
    baseQuery: fetchBaseQuery({
        baseUrl: HttpCommon.baseURL,
    }),
    endpoints: (builder) => ({
        getTweet: builder.query({
            query: () => "/tweet",
        }),
        createTweet: builder.mutation({
            query: (data) => ({
                url: "/tweet",
                method: "POST",
                body: data,
            }),
        }),
        deleteTweet: builder.mutation({
            query: (id) => ({
                url: `/tweet/${id}`,
                method: "DELETE",
            }),
        }),
    }),
});

export const { useGetTweetQuery, useCreateTweetMutation, useDeleteTweetMutation } = tweetApi;
