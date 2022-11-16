<tr @if($loop->odd) class="table-primary" @endif>
                                        
    <th scope="row">{{$loop->index}}</th>
    <td>{{ $contact['name'] }}</td>
    <td>{{ $contact['phone'] }}</td>
    <td>alfred@test.com</td>
    <td>Company one</td>
    <td width="150">
        <a href="{{ route('contact.show', $id) }}"
            class="btn btn-sm btn-circle btn-outline-info" title="Show"><i
                class="fa fa-eye"></i></a>
        <a href="form.html" class="btn btn-sm btn-circle btn-outline-secondary"
            title="Edit"><i class="fa fa-edit"></i></a>
        <a href="#" class="btn btn-sm btn-circle btn-outline-danger"
            title="Delete" onclick="confirm('Are you sure?')"><i
                class="fa fa-times"></i></a>
    </td>
</tr>