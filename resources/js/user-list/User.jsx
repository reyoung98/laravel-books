function User({
    name,
    email
}) {

  return (
    <div className="user-list__user">
        <div className="user-list__name">{ name }</div>
        <div className="user-list__email">{ email }</div>
    </div>
  );
}

export default User;
