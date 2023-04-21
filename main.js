
const { createApp } = Vue

createApp({
  data() {
    return {
      todoList: [],
      serverUrl: 'server/server.php',
      newTodo: {
        text: '',
        done: false,
      }

    }
  },
  mounted() {
    this.getTodoList();
  },
  methods: {
    getTodoList(){
      axios.get(this.serverUrl)
      .then(response => this.todoList = response.data ? response.data : [] )
    },
    addTodoCheck(){
      if(this.newTodo.text && this.newTodo.text.trim() != ''){
        this.addTodo();
      }
    },
    addTodo(){
      const data = {
        operation: 'add',
        newTodo: this.newTodo,
      };

      axios.post(this.serverUrl, data,
        {
          headers: { 'Content-Type': 'multipart/form-data' }
        }).then(response => {
          this.todoList = response.data;
          this.newTodo.text = '';
          this.newTodo.done = false;
        })
    },
    deleteTodo(index){
      const data = {
        operation: 'delete',
        index,
      };

      axios.post(this.serverUrl, data,
        {
          headers: { 'Content-Type': 'multipart/form-data' }
        }).then(response => {
          this.todoList = response.data;
        })
    },
    checkTodo(index){
      const data = {
        operation: 'check',
        index,
      };

      axios.post(this.serverUrl, data,
        {
          headers: { 'Content-Type': 'multipart/form-data' }
        }).then(response => {
          this.todoList = response.data;
        })
      
    }
  },
}).mount('#app')
