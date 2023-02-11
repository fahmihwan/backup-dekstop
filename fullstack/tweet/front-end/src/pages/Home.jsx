import React, { useCallback, useState } from "react";
import { useCreateLikeMutation } from "../redux/features/likeApi";
import { useCreateTweetMutation, useDeleteTweetMutation, useGetTweetQuery } from "../redux/features/tweetApi";

const Home = () => {
    const { data: tweets, isLoading, isSuccess, isError, error, refetch } = useGetTweetQuery();
    const [valTweet, setValTweet] = useState("");

    const [createTweet, { loading }] = useCreateTweetMutation();
    const [createLike, { loadin }] = useCreateLikeMutation();

    const [deleteTweet] = useDeleteTweetMutation();

    const handleSubmit = async (e) => {
        e.preventDefault();
        await createTweet({
            article: valTweet,
        });
        refetch();
        setValTweet("");
    };

    const handleLike = useCallback(async (id) => {
        await createLike({
            tweet_id: id,
        })
            .then((d) => console.log(d.data))
            .catch((err) => console.log(err));
        refetch();
    }, []);

    const handleDelete = useCallback(async (id) => {
        await deleteTweet(id);
        refetch();
    }, []);

    return (
        <div className="w-5/12 border border-gray-700   ">
            <section className="border-b border-gray-700 px-5">
                <p className="py-5">Home</p>
            </section>
            <section className="border-b border-gray-700 px-5 py-2 mb-4">
                <form onSubmit={handleSubmit}>
                    <div className="py-2">
                        <textarea
                            onChange={(e) => setValTweet(e.target.value)}
                            value={valTweet}
                            className="textarea textarea-ghost w-full placeholder:text-2xl"
                            placeholder="What's Happening?"
                        ></textarea>
                    </div>
                    <button className="btn btn-sm float-right btn-primary ">twet</button>
                    <div className="clear-right"></div>
                </form>
            </section>

            <section>
                {tweets?.data?.map((d, i) => (
                    <DataTweet handleDelete={handleDelete} handleLike={handleLike} key={i} data={d} />
                ))}
            </section>
        </div>
    );
};

export default Home;

const DataTweet = ({ handleDelete, handleLike, data }) => {
    return (
        <div className="w-full flex border-b border-gray-700  mb-5">
            <div className="w-1/12 flex justify-center items-start ml-5">
                <div className=" w-10 h-10 bg-gray-400 text-black rounded-full flex justify-center items-center">
                    <i className="text-2xl fa-regular fa-user"></i>
                </div>
            </div>
            <div className="w-11/12 px-2  ">
                <div className="flex justify-between">
                    <div className="flex justify-between  w-full">
                        <div className="flex">
                            <p className="mr-2 font-semibold">hee</p>
                            <p className="text-gray-400 mr-5">@hee</p>
                        </div>
                        <p className="text-gray-400 ">{data.created_at}</p>
                    </div>
                    <div className="dropdown dropdown-end  ">
                        <label tabIndex={0} className="px-6 h-8 block  cursor-pointer">
                            <i className="fa-solid text-gray-500 fa-ellipsis"></i>
                        </label>
                        <ul
                            tabIndex={0}
                            className="dropdown-content bg-black menu p-2 shadow border border-gray-700 rounded w-52"
                        >
                            <li>
                                <button onClick={() => handleDelete(data.id)} className="text-red-600">
                                    <i className="fa-regular fa-trash-can"></i> Hapus
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div className="text-sm text-gray-200 ">{data.article}</div>
                <div className="flex items-center py-3">
                    <div className="mr-10">
                        <i className="fa-regular fa-comment"></i>
                    </div>
                    <label className="swap" onClick={() => handleLike(data.id)}>
                        <input type="checkbox" />
                        <div className="swap-on">
                            <i className="text-red-500 fa-solid fa-heart">
                                <span className="text-red-500 text-xs ml-1">{data?.likes?.length}</span>
                            </i>
                        </div>
                        <div className="swap-off">
                            <i className="fa-regular fa-heart"></i>{" "}
                            <span className="text-gray-400">{data?.likes?.length}</span>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    );
};
