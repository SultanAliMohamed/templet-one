// Service to handle user data operations
export class UserService {
  constructor() {
    this.users = JSON.parse(localStorage.getItem('users') || '[]');
  }

  saveUsers() {
    localStorage.setItem('users', JSON.stringify(this.users));
  }

  addUser(user) {
    this.users.push(user);
    this.saveUsers();
  }

  getAllUsers() {
    return this.users;
  }

  updateUser(index, updatedUser) {
    if (index >= 0 && index < this.users.length) {
      if (!updatedUser.password) {
        updatedUser.password = this.users[index].password;
      }
      this.users[index] = updatedUser;
      this.saveUsers();
      return true;
    }
    return false;
  }

  deleteUser(index) {
    if (index >= 0 && index < this.users.length) {
      this.users.splice(index, 1);
      this.saveUsers();
      return true;
    }
    return false;
  }
}