export function resetObject(object) {
  if(!(object instanceof Object))
    return;
  for (const [key, value] of Object.entries(object)) {
    if(typeof value === 'string')
      object[key] = '';
    else if (typeof value === 'number')
      object[key] = 0;
    else if (typeof value === 'undefined')
      object[key] = undefined;
    else if (typeof value === 'object')
     resetObject(object[key]);
    else
      object[key] = null;
  }
}

export function assignErrors(requestErrors, errorsObject) {
    for(const key of Object.keys(requestErrors)) {
        errorsObject[key] = requestErrors[key].at(0);
    }
}
