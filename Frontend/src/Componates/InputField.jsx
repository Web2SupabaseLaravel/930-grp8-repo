import React from 'react';

function InputField({ name, type = "text", placeholder, value, onChange }) {
  return (
    <input
      name={name}
      type={type}
      placeholder={type === "date" ? "" : placeholder}
      value={value}
      onChange={onChange}
      className="input-field"
      required
    />
  );
}

export default InputField;

