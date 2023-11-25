<tr>

    <th scope="row">{{ $contacts->firstItem() + $index }}</th>
    <td>{{ $contact->first_name }}</td>
    <td>{{ $contact->last_name }}</td>
    <td>{{ $contact->email }}</td>
    <td>{{ $contact->company->name }}</td>
    <td width="150">
        @if ($showTrashButtons)
            <form action="{{ route('contacts.restore', $contact->id) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-circle btn-outline-info" title="Restore"><i class="fa fa-undo "></i></button>
            </form>
            <form action="{{ route('contacts.force-delete', $contact->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Your data will be removed permanently. Are you sure?')">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-circle btn-outline-danger"  title="Delete Permanently
                "><i class="fa fa-times "></i></button>
            </form>
        @else
        <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-sm btn-circle btn-outline-info"
            title="Show"><i class="fa fa-eye"></i></a>
        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-circle btn-outline-secondary"
            title="Edit"><i class="fa fa-edit"></i></a>
        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-danger" title="Delete"><i class="fa fa-trash "></i></button>
        </form>
        @endif
       
    </td>
</tr>
