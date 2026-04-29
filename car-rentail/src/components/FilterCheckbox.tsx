interface FilterCheckboxProps {
  id: string
  label: string
  defaultChecked?: boolean
}

export default function FilterCheckbox({
  id,
  label,
  defaultChecked = false,
}: FilterCheckboxProps) {
  return (
    <div className="form-check custom-checkbox">
      <input
        className="form-check-input"
        type="checkbox"
        defaultChecked={defaultChecked}
        id={id}
      />
      <label className="form-check-label fs-sm" htmlFor={id}>
        {label}
      </label>
    </div>
  )
}
