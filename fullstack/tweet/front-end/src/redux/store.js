import { configureStore } from "@reduxjs/toolkit";
import { setupListeners } from "@reduxjs/toolkit/dist/query";
import { authApi } from "./features/authApi";
import { likeApi } from "./features/likeApi";

import { tweetApi } from "./features/tweetApi";

export const store = configureStore({
    reducer: {
        [tweetApi.reducerPath]: tweetApi.reducer,
        [likeApi.reducerPath]: likeApi.reducer,
        [authApi.reducerPath]: authApi.reducer,
    },
    middleware: (getDefaultMiddleware) =>
        getDefaultMiddleware().concat([tweetApi.middleware, likeApi.middleware, authApi.middleware]),
});
setupListeners(store.dispatch);
