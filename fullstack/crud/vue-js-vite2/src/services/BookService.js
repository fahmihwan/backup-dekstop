import httpCommon from "../http-common";

class BookService {
    getAll() {
        return httpCommon.get("/books");
    }
    create(data) {
        return httpCommon.post("/books", data);
    }
    updated(id, data) {
        return httpCommon.put(`/books/${id}`, data);
    }

    delete(id) {
        return httpCommon.delete(`/books/${id}`);
    }

    detail(id) {
        return httpCommon.get(`/books/${id}`);
    }
}

export default new BookService();
