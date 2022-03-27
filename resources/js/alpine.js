document.addEventListener('alpine:init', () => {
    Alpine.data('BookCrud', () => ({
            addMode: true,
            id: '',
            form: {
                id: '',
                name: '',
                author: '',
            },
            
            books() {
                fetch('/api/getAll')
                .then(response => response.json())
                .then(data => this.form = data)
            },
            saveData() {
                const data = new FormData();
                data.append('name', this.form.name);
                data.append('author', this.form.author);

                axios.post('/api/add',data)
                .then(response => {
                    this.books();

                    name = this.form.name;
                    author = this.form.author;
                })
                .catch(error => {
                    this.errorMessage.title = error.response.data.errors.title;
                    this.errorMessage.author = error.response.data.errors.author;
                })
               
            },
            editData(data) {
                this.addMode = false
                this.form.name = data.name
                this.form.author = data.author
                this.form.id = data.id
            },
            updateData() {
                axios.put(`/api/update/${this.form.id}`,{
                    id: this.form.id,
                    name: this.form.name,
                    author: this.form.author,
                }).then(response => {
                    this.books();
                    id = this.form.id;
                    name = this.form.name;
                    author = this.form.author;
                    this.resetForm()
                })
                .catch(error => {
                    this.errorMessage.name = error.response.data.errors.name;
                    this.errorMessage.author = error.response.data.errors.author;
                })
            },
            deleteData(id) {
                alert(id);
                axios.delete(`/api/delete/${id}`)
                .then(response => {
                    this.books();
                })
            },
            cancelEdit(){
                this.resetForm()
            },
            resetForm() {
                this.form.name = ''
                this.form.author = ''
                this.addMode = true
            }
    }));
});
